<template>
    <div class="container">
    <div class="col-md-12 ">
        <div class="row">
            
            <div  v-for="item in items.data" :key="item.id" class="col-md-4" @click="showModal(item.id)">
                <div class="card randevu">
                    <span class="randevu-no">Randevu {{item.id}}</span>
                    <span class="yeni-randevu" v-if="item.isAktive==0">Yeni</span>
                    <span class="yeni-randevu" v-if="item.isAktive==1">Onaylı</span>
                    <span class="yeni-randevu" v-if="item.isAktive==2">İptal</span>
                    
                <div class="randevu-detay">
                    <span class="randevu-no">{{item.fullname}}</span>
                    <span>{{item.date}}</span><br/>
                    <span>{{item.randevusaati.hours}}</span>
                </div>
                <div v-if="!item.isAktive">
                    <button @click="onayla(item.id)" class="btn btn-success btn-block">Onayla</button>
                    <button @click="iptal(item.id)" class="btn btn-danger btn-block">İptal</button>
                </div>
                </div>
            </div>
            <randevudetay-component  :modalId="showModalId" v-if="isModalVisible" @close="isModalVisible = false" >
                <!--
              you can use custom content here to overwrite
              default content
            -->
               
              </randevudetay-component>
            
           
        </div>
        <div class="row">
            <pagination :data="items" @pagination-change-page="getData"></pagination>
        </div>
    </div>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                isModalVisible: false,
                showModalId:0,
                items:{
                    data:[]
                },
            }
        },
        created() {
            this.getData();
            
            
        },
        mounted() {
           
        },
        methods:{
            getData(page){
                if(typeof page==='undefined'){
                    page=1;
                }
                console.log(page);
                axios.get('http://127.0.0.1:8000/api/today-list/?page='+page)
               .then((cevap)=>{
                   this.items=cevap.data;
               })
            },
            onayla:function(id){
                axios.post('http://127.0.0.1:8000/api/randevu-durumu',{
                        id:id,
                        type:1,
                        
                    }).then((cevap)=>{
                        
                         this.getData();
                    })
            },
            iptal:function(id){
                axios.post('http://127.0.0.1:8000/api/randevu-durumu',{
                        id:id,
                        type:2,
                        
                    }).then((cevap)=>{
                        
                         this.getData();
                    })
            },
            showModal:function(id) {
            
            this.showModalId=id  ;
            this.isModalVisible = true;
          },
        }
    }
</script>
