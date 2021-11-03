<template>
    <div class="container">
    <div class="col-md-12 ">
        <span >child componentte (admincalismasaatleriitem) @add emiti tetiklendiğinde  ekle fonksiyonuda tetiklenir.emit içerisinde(@add) child componentten gelen data vardır </span>
       <admincalismasaatleriitem-component @add="ekle" day="pazartesi" title="Pazartesi" :data="pazartesi"></admincalismasaatleriitem-component>
       <admincalismasaatleriitem-component @add="ekle" day="sali" title="Salı" :data="sali"></admincalismasaatleriitem-component>
       <admincalismasaatleriitem-component @add="ekle" day="carsamba" title="Çarşamba" :data="carsamba"></admincalismasaatleriitem-component>
       <admincalismasaatleriitem-component @add="ekle" day="persembe" title="Perşembe" :data="persembe"></admincalismasaatleriitem-component>
       <admincalismasaatleriitem-component @add="ekle" day="cuma" title="Cuma" :data="cuma"></admincalismasaatleriitem-component>
       <admincalismasaatleriitem-component @add="ekle" day="cumartesi" title="Cumartesi" :data="cumartesi"></admincalismasaatleriitem-component>
       <admincalismasaatleriitem-component @add="ekle" day="pazar" title="Pazar" :data="pazar"></admincalismasaatleriitem-component>
        
       <button @click="kaydet" class="btn btn-success">Kaydet</button>
        
    </div>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                pazartesi:[],
                sali:[],
                carsamba:[],
                persembe:[],
                cuma:[],
                cumartesi:[],
                pazar:[]
            }
        },
        created() {
             axios.get('http://127.0.0.1:8000/api/calisma-list').then((cevap)=>{
                       

                           for (var i = 0; i < cevap.data.length; i++) {
                                if(cevap.data[i].day==1){
                                    this.pazartesi.push(cevap.data[i].hours)
                                }
                                if(cevap.data[i].day==7){
                                    this.pazar.push(cevap.data[i].hours)
                                }
                                if(cevap.data[i].day==5){
                                    this.cuma.push(cevap.data[i].hours)
                                }
                                if(cevap.data[i].day==6){
                                    this.cumartesi.push(cevap.data[i].hours)
                                }
                                if(cevap.data[i].day==2){
                                    this.sali.push(cevap.data[i].hours)
                                }
                                if(cevap.data[i].day==3){
                                    this.carsamba.push(cevap.data[i].hours)
                                }
                                if(cevap.data[i].day==4){
                                    this.persembe.push(cevap.data[i].hours)
                                }
                                  
                            }
                            console.log(cevap.data[0]);
                          
                    })

            
            
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
           ekle:function(data){
                this[data.day].push(data.text);

            },
             kaydet:function(){
              axios.post('http://127.0.0.1:8000/api/calisma-saati-ekle',{
                        pazartesi:this.pazartesi,
                        sali:this.pazartesi,
                        carsamba:this.carsamba,
                        persembe:this.persembe,
                        cuma:this.cuma,
                        cumartesi:this.cumartesi,
                        pazar:this.pazar,
                        
                        
                    }).then((cevap)=>{
                        
                           console.log(cevap);

                    })

            },
        }   
    }
</script>
