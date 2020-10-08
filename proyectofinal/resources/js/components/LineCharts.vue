<template>
  <div ><!--id="app"-->
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
      ],
      chartOptions: {
        chart: {
          title: "Datos sensados para el Dispositivo",
          subtitle: "Humedad y Temperatura",
          
        },
        title: "Humedad y Temperatura",
        legend: { position: 'bottom' },
        width: 1000,
        height: 400,
        series: {
          0: {targetAxisIndex: 0},
          1: {targetAxisIndex: 1}
        },
        vAxes: {
          // Adds titles to each axis.
          0: {title: 'Temperatura (°C)'},
          1: {title: 'Humedad (%)'}
        }


      }
    };
  },  
props:{
    topic:String,
    dia:String
},  

methods: {
      loadData() {
          axios.get('/api/seriedia/'+this.topic+"/"+this.dia)
                      .then((response)=>{
                        var data = [["Fecha", "Temperatura", "Humedad"]];
                        var contador = 0;
                        response.data.forEach(obj => {
                          var fil = [obj.timestamp.substring(0,10), parseFloat(obj.temperatura), parseFloat(obj.humedad)];
                          data.push(fil);
                          contador++;
                        });
                        this.chartData = data;
                        if (contador==0) {
                            this.chartData = [["Fecha", "Temperatura", "Humedad"],['00:00:00',0,0]];
                        }
                        
                      });
      }
  },
  created() {
      this.loadData();
  }  
};
</script>