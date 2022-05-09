<template>
    <div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
        <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
          <div class="articlewrapper col-12 m-auto p-3">
              <h3 class="mainfontcolor newarticletitle col-12 pt-1 pb-1 mb-0 bg-transparent pl-0 pr-0">NEW!!</h3>
              <div class="newestarticle d-flex w-100 bg-white pt-2 pb-2 pr-4 pl-4 mb-3">
                  <article class="p-news-list__item js-inter fadeInLeft is-invasion">
                      <a href="p-news-list__item js-inter fadeInLeft is-invasion">
                          <div class="w-100">
                              <p class="mb-0 font-weight-bold">
                              </p>
                          </div>
                      </a>
                  </article>
              </div>
              <div class="gridinside w-100 bg-white p-3">
                  <img src="" class="clipicon position-absolute">
                  <div id="notificationarea"></div>

                  <div class="d-inline-block w-100 mt-3">
                      <div id="notificationpagenationarea" class="col-10 col-md-6 col-lg-4 d-flex m-auto">
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'DashboardView',
  props: {
    msg: String,
  },
});
</script>