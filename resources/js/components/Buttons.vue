<template>

    <div class="container">

             <h1>hellow world</h1>
             <!-- <First></First> -->
              <component :is="currentTabComponent" ></component>
 
        <button class="btn btn-warning" @click="navigatePrev" type="button" v-show="togglePrevious()">Previous</button>

        <button class="btn btn-info" @click="navigateNext" type="button">{{ nextBtnTxt() }}</button>


     <!--   <transition name="modal">
            <div class="modal-mask" v-show="showResult">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header">
                            Congrats
                        </div>

                        <div class="modal-body" v-html="result">

                        </div>

                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="modal-default-button btn btn-warning" @click="close">
                                    close
                                </button>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition> -->

    </div>

</template>

<script>
import Step1 from './Step1.vue';
    export default {

        data() {

            return {
                // showResult: false,
                // result: ''
                step:1,
                steps:[1,2,3,4]
            }
        },
        components:{
            Step1
            },
        computed: {
    currentTabComponent() {
      return 'Step'+this.step;
    }},
        methods: {
            nextBtnTxt() {
            //   if(this.$route.name == 'thirdStep') {

            //       return 'Finish';
            //   }

              return 'Next';
            },
            togglePrevious() {
                if(this.step == 1) {

                    return false;
                }

                return true;
            },
            navigateNext() {

                if(this.step == 1) {

                    this.step=2;
                } else if(this.step == 2) {

                    this.step=3;

                } else {

                    // handle saving of the form
                    this.result = `
                        <p><strong>Firstname: </strong> ${this.$store.state.firstname}</p>
                        <p><strong>Lastname: </strong> ${this.$store.state.lastname}</p>
                        <p><strong>Email: </strong> ${this.$store.state.email}</p>
                        <p><strong>Gender: </strong> ${this.$store.state.gender}</p>
                        <p><strong>Phone: </strong> ${this.$store.state.phone}</p>
                        <p><strong>Country: </strong> ${this.$store.state.country}</p>
                        <p><strong>State: </strong> ${this.$store.state.state}</p>
                        <p><strong>Facebook: </strong> ${this.$store.state.facebook}</p>
                        <p><strong>Twitter: </strong> ${this.$store.state.twitter}</p>
                    `

                    this.showResult = true;


                }
            },
            navigatePrev() {

                if(this.step == 3) {

                    this.step=2;
                } else if(this.step == 2) {

                  this.step=1;
                }
            },
            // close() {
            //     this.showResult = false
            // }
        }

    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 70%;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>