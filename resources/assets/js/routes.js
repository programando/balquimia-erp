
import Vue       from 'vue';
import Router    from 'vue-router';
Vue.use(Router);
Vue.config.devtools = true;



export default new Router({
   routes : [
        { component : require('./components/generales/dashboad'),
          name      : 'inicio',
          path      : '/'     },

        { component : require('./components/generales/Cargos'),
          name      : 'cargos',
          path      : '/cargos'     },

        { component : require('./components/productos/ProdUndMedidas') ,
          name      : 'und-medidas',
          path      : '/und-medida'     },

        { component : require('./components/generales/Lineas')  ,
          name      : 'lineas',
          path      : '/lineas'     },

        { path      : '*' ,
          component : require('./components/errors/404')
        }

      ],
  // linkExactActiveClass: 'active',
   linkActiveClass:   'active',
   mode:              'history',
});
