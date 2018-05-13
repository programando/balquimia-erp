const VueMenuApp = new Vue({

    el: '#VueMenuApp',

      data :{
    },

    methods:{
      Activar: function( item ){
        $("#VueMenuApp li").removeClass("active");
        $("#menu"+item).addClass("active");
      },
    }

});
