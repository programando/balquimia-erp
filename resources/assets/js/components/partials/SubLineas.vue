<template>
   <div>
       <div v-for="(item, key, index) in Registro.sub_lineas" :key="Registro.idlinea" style="display: inline;">
        {{ item.nom_sub_linea }}<span v-if="key < Registro.sub_lineas.length-1">,</span>
    </div>
    </div>
</template>

<script>

  export default{
      props :['Registro']
  };
</script>
