<template>

        <div class="modal-mask" >
          <div class="modal-wrapper">
            <div class="modal-container" style="width:500px;">

              <div class="modal-header">
                {{data.fullname}}
              </div>

              <div class="modal-body">
                <slot name="body">
                  <div>
                     <span>Telefon:{{data.phone}}</span><br/>
                     <span>Email:{{data.email}}</span><br/>
                     <span>Tarih:{{data.date}}</span><br/>
                     <span>Saat:{{data.randevusaati.hours}}</span><br/>
                      <span>Bildirim Tipi:{{data.notification_type}}</span><br/>
                     
                  </div>
                  <div>

                    NOT
                    <div v-for="item in not">{{item.text}}</div>
                  </div>
                  <div>
                    <textarea class="form-control" v-model="text" cols="30" rows="4"></textarea>
                    <button class="btn btn-primary mt-5" @click="store">
                    dasdas
                  </button>
                  </div>
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  
                  <button class="modal-default-button" @click="$emit('close')">
                    x
                  </button>
                  
                </slot>
              </div>
            </div>
          </div>
        </div>
      
</template>
<script>
    export  default
    {
        props:['modalId'],

        data() {
         return {
                text:'',
                data:[],
                not:[]
            }
          },
        created()
        {
          
                this.veriler();
        },
        methods:{
           
      store:function() {

       axios.post('http://127.0.0.1:8000/api/calisma-not-ekle',{
          id:this.modalId,
          text:this.text
       }).then((cevap)=>{
                this.text='';
                   this.veriler();
               })
       },
          veriler:function(){
        axios.get('http://127.0.0.1:8000/api/randevu-detay/'+this.modalId)
               .then((cevap)=>{
                   this.data=cevap.data;
                   
                   this.not=cevap.data.randevunotu;
                   console.log(this.not);
               })
      }
      }
      
    }
</script>