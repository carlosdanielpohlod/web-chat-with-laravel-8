<template>
    <div class="row">
        <span class="col-xs-5 box mt-1 " :class="{me, other}">{{name}}: {{msg}} </span>
    </div>
</template>

<script>
export default {
    props :{
        me: {type:Boolean},
        other: {type:Boolean},
        name:{},
        msg: {}
    }
}
</script>

<style scoped>
    
.box {
  width: 300px;
  margin: 50px auto;
  background: #00bfb6;
  padding: 20px;
  text-align: center;
  font-weight: 900;
  color: #fff;
  font-family: arial;
  position:relative;
}
.other:before {
  content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  
  border-left: 10px solid transparent;
  border-right: 10px solid #00bfb6;
  border-top: 10px solid #00bfb6;
  border-bottom: 10px solid transparent;
  left: -19px;
  top: 6px;
}
.me:before {
  content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  border-left: 10px solid #00bfb6;
  border-right: 10px solid transparent;
  border-top: 10px solid #00bfb6;
  border-bottom: 10px solid transparent;
  right: -20px;
  top: 6px;
}


</style>