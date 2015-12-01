new Vue({
  el: '#clock',
  data: {
    digitalClock: ''
  },

    ready:function(){

      var that = this;

      setInterval(function(){

        var date = new Date();

        var hour = date.getHours();

        var minute = date.getMinutes();

        var second = date.getSeconds();

        var digital_Clock = hour+ ' : ' +minute + ' : ' +second;

        that.digitalClock = digital_Clock; 



      }, 1000);

  }

})