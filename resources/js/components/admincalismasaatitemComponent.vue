<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{title}} -<button class="btn btn-secondary" @click="showForm">+</button></button></div>
                    <div v-if="isShow" style="padding:10px;">
                        <input type="text"  class="form-control" v-model="time" placeholder="Çalışma saati : 10-11" >
                        <button @click="addTime" style="margin-top:5px;" class="btn btn-primary">Ekle</button>
                    </div>
                    <div class="card-body">
                        <div v-for="item in data">{{item}}</div>
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
                isShow:false,
                time:''
            }
        },
        methods:{
            showForm:function(){
                this.isShow=!this.isShow
            },
            addTime:function(){
                this.$emit('add',{text:this.time,day:this.day}); //anacomponentteki @add emitine gönderdik
                this.time="";
                this.isShow=false;
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        props:['title','data','day'] //props ile veri aktarımı sağladık başka componentten (admincalismasaatleri componentinden)
    }
</script>
