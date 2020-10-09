<template>
  <div class="publish">
    <button class="btn btn-success btn-xs" type="button" @click="publicarON"><span class="glyphicon glyphicon-off"></span> Prender</button>
    <button class="btn btn-danger btn-xs" type="button" @click="publicarOFF"><span class="glyphicon glyphicon-off"></span> Apagar</button>
  </div>
</template>

<script>
export default {
  methods: {
    publicarON () {
      this.$mqtt.publish(this.topic, 'on')
    },
    publicarOFF () {
      this.$mqtt.publish(this.topic, 'off')
    }
  },  
  props:{
    topic:String
  }
}
</script>

