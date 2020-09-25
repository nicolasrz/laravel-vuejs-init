<template>
    <div class="container-fluid">
     
      <div class="row">
        <div class="col-4">
        <list></list>
        </div>
        <div class="col-8">
          <show></show>
        </div>
      </div>
       <router-view/>
    </div>
</template>

<script>
import List from "./components/Contact/List";
import Show from "./components/Contact/Show"
export default {
  components: {List, Show}
};
</script>
