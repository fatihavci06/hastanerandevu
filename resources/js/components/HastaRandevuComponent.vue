<template>
    <div class="container">
    <div >
    <div class="row"  style="text-align:center;"><h3>Randevu Takip Sistemi</h3>
    <h3>Randevularını görmek için bilgileri doğru giriniz</h3></div>
    <div class="row">
            <div class="form-group">
                <ul>
                    <li style="color:red;" v-for="i in errors" >{{i}}</li>
                </ul>
            </div>
            </div>

        <div class="row justify-content-center">
          
            <div class="col-md-12 ">
                <div class="form-group">
                <input type="text" class="form-control" v-model="code" placeholder="Randevu Kodu">
                </div>
            </div>
            
           
            
            
           
            <div class="col-md-12 " style="text-align: center;">
                <div class="form-group">
                    <button v-on:click="store" class="btn btn-success">Randevu Ara</button>
                </div>
            </div>
            <div v-if="formcomplete">
                <div class="row">
                    <div class="col-md-12">
                        Tarih:{{data.date}}
                    </div>
                    <div class="col-md-12">
                        Saat:{{saat}}
                    </div>
                    <div class="col-md-12">
                        Bildirim Tipi:{{bildirim}}
                    </div>
                    <div class="col-md-12">
                        NOTLAR
                    </div>
                    <div class="col-md-12" v-if="not" v-for="item in not">
                        {{item.text}}
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    
    </div>
</template>

<script>
    export default {
        data(){
            return{
                code:'',
                formcomplete:false,
                errors:[],
                data:[],
                not:[],
                saat:[],
                bildirim:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
         methods:{
            store:function(){
                if(this.code!=''){
                    axios.post('http://127.0.0.1:8000/api/randevu-hasta-ekrani',{
                        code:this.code,
                    })
                   .then((cevap)=>{
                       
                       console.log(cevap);
                       if(cevap.data.status==true){
                        this.errors=[];
                        this.data=cevap.data;
                        this.code='';
                        this.formcomplete=true;
                        this.saat=cevap.data.randevusaati.hours;
                        this.not=cevap.data.randevunotu;
                        if(cevap.data.notification_type==0){
                            this.bildirim='sms';
                        }
                        else{
                            this.bildirim='mail';
                        }
                       }
                       else{
                            this.errors=[];
                            this.errors.push(cevap.data.message);
                       }
                   })
                }
                if(this.code===''){
                this.errors=[];
                this.errors.push('Randevu Kodu Boş');
                }
            }
        }
    }
</script>
