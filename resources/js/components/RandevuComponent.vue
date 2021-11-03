<template>
    <div class="container">
    <div v-if="formcomplete">
    <div class="row"  style="text-align:center;"><h3>Randevu Takip Sistemi</h3></div>
    <div class="row">
            <div class="form-group">
                <ul>
                    <li style="color:red;" v-for="i in errors" >{{i}}</li>
                </ul>
            </div>
            </div>

        <div class="row justify-content-center">
          
            <div class="col-md-4 ">
                <div class="form-group">
                <input type="text" class="form-control" v-model="name" placeholder="Ad Soyad">
                </div>
            </div>
            <div class="col-md-8 ">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <input type="text" class="form-control" v-model="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <input type="text" class="form-control" v-mask="'##-###-###-##-##'" v-model="phone" placeholder="Telefon">
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-md-12 ">
                <div class="form-group">
                <input type="date" v-on:change="SelectDate" v-bind:min="mindate" class="form-control" v-model="date" >
                </div>
            </div>
            <div class="col-md-12 ">
            <ul class="select-time-ul">
                <li class="select-time" v-for="item in workingHour" v-if="item.isAktive"><input type="radio" v-model="saat" v-bind:value="item.id"><span> {{item.hours}}</span></li>
                
            </ul>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                <textarea v-model="text" cols="30" rows="5" id="" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-12 " >
                <div class="row" >
                
                    <div class="form-group" style="text-align: center;">
                        <input type="radio" v-model="notification_type" value="0">
                        <label>Sms</label>
                        <input type="radio" v-model="notification_type" value="1">
                        <label>E-mail</label>
                         
                    </div>
                </div>
                
            </div>  
            
           
            <div class="col-md-12 " style="text-align: center;">
                <div class="form-group">
                    <button v-on:click="store" class="btn btn-success">Randevu Oluştur</button>
                </div>
            </div>

            
        </div>
    </div>
    <div v-if="!formcomplete" class="complete-form">
        <i class="far fa-check-circle" style="color: green;"></i>
        <span>Randevunuz Başarıyla Alındı...</span>

    </div>
    </div>
</template>



<script>
    
    export default {
        data(){
            return{
            formcomplete:true,
            errors:[],
            saat:0,
            notification_type:null,
            name:null,
            email:null,
            phone:null,
            mindate:new Date().toISOString().slice(0,10), //bugünün tarihini date değişkenine atadık. date
            date:new Date().toISOString().slice(0,10), //bugünün tarihini date değişkenine atadık. date değişkeninin geçtiği yerlerde bugünün tarihi yazcak
            text:"",
            workingHour:[]
            }
        },
        methods:{
            store:function(){
                if(this.name && this.email && this.notification_type && this.validEmail(this.email) &&this.phone && this.saat)
                {
                    axios.post('http://127.0.0.1:8000/api/randevukaydet',{
                        fullname:this.name,
                        phone:this.phone,
                        email:this.email,
                        date:this.date,
                        workingHour:this.saat,
                        notification_type:this.notification_type
                    }).then((cevap)=>{
                        
                        this.formcomplete=false;
                         console.log(cevap);
                    })
                    
                }
                this.errors=[];
                if(!this.name){
                    this.errors.push('İsim Soyisim girilmelidir');
                }
                if(!this.notification_type){
                    this.errors.push('Bildirim tipi seçilmelidir');
                }
                if(!this.email){
                    this.errors.push('Email girilmelidir');
                }
                else if (!this.validEmail(this.email)) {
                    this.errors.push('Email Formatı Doğru Olmalı.');
                }
                if(!this.phone){
                    this.errors.push('Telefon numarası girilmelidir');
                }
                if(!this.saat){
                    this.errors.push('Saat seçilmelidir');
                }
            },
            SelectDate:function(){
                axios.get('http://127.0.0.1:8000/api/calisma-saatleri/'+this.date) //axios get ile servis apimizden veri çekiyoruz
               .then((cevap)=>{
                   this.workingHour=cevap.data; //controllerdan dönen datayı yukarıda tanımlamış olduğumuz workingHour içerisine attık.
                   console.log(cevap.data);
               })
            },
             validEmail: function (email) {
              var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              return re.test(email);
            }

        },
        mounted() {
           axios.get('http://127.0.0.1:8000/api/calisma-saatleri')
           .then((cevap)=>{
               this.workingHour=cevap.data;
               console.log(cevap);
           })
        }
    }
</script>
