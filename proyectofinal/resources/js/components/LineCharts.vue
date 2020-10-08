<template>
  <div id="app">
    <GChart
      type="LineChart"
      :data="chartData"
      :options="chartOptions"
    />    
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";
export default {
  components: {
    GChart
  },
  data() {
    return {
      chartData: [
 ["Year", "Sales", "Expenses", "Profit"],
        ["2014", 1000, 400, 200],
        ["2015", 1170, 460, 250],
        ["2016", 660, 1120, 300],
        ["2017", 1030, 540, 350]
  

      ],
      chartOptions: {
        chart: {
          title: "Datos sensados para el Dispositivo",
          subtitle: "Humedad y Temperatura"
        }
      }
    };
  },  
props:{
    topic:String,
},  
methods: {
      loadData() {
          axios.get('/api/serie/'+this.topic)
                      .then((response)=>{
                        var data = [["Fecha", "Temperatura", "Humedad"]];
                        //console.log(response.data);
                        response.data.forEach(obj => {
                          //var date = new Date(parseInt(obj.timestamp));
                          var fil = [obj.timestamp, parseFloat(obj.temperatura), parseFloat(obj.humedad)];
                          data.push(fil);
                        });
                        this.chartData = data;
                        
                      });
      }
  },
  created() {
      console.log("entro");
      console.log(this.topic);
      console.log('api/serie/'+this.topic);
      this.loadData();
  },
  beforeMount: function () {
    //this.parametro = this.$el.attributes['parametro'].value;
    //console.log(this.attributes['parametro'].value);
  }  
};
</script>