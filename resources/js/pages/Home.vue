<template>
    <div class="container mt-5">
        <h1 class="">Windows логи</h1>

        <div class="accordion" id="accordionWindows" v-for="(log, index) in windowsLogs">
            <div class="accordion-item mt-2">
                <h2 class="accordion-header" :id="'headingWindows'+index">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapseWindows'+index" aria-expanded="false" :aria-controls="'collapseWindows'+index">
                    <div class="w-100 d-flex justify-content-between px-3">
                        <span><b>Id: </b>{{ log.id }} <b>Event_Id: </b>{{ log.event_id }}</span>
                        <span class="text-truncate w-25">{{ log.description }}</span>                
                        <span><b>Created at: </b>{{ log.created_at }}</span>
                    </div>
                </button>
                </h2>
                <div :id="'collapseWindows'+index" class="accordion-collapse collapse" :aria-labelledby="'headingWindows'+index" data-bs-parent="#accordionWindows">
                <div class="accordion-body">
                    {{ log.description }}
                </div>
                </div>
            </div>
        </div>

        <h1 class="mt-5">Linux логи</h1>

        <div class="accordion" id="accordionLinux" v-for="(log, index) in linuxLogs">
            <div class="accordion-item mt-2">
                <h2 class="accordion-header" :id="'headingLinux'+index">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapseLinux'+index" aria-expanded="false" :aria-controls="'collapseLinux'+index">
                    <div class="w-100 d-flex justify-content-between px-3">
                        <span><b>Id: </b>{{ log.id }} <b>Event_Id: </b>{{ log.hostname }}</span>
                        <span class="text-truncate w-25">{{ log.message }}</span>                
                        <span><b>Created at: </b>{{ log.timestamp }}</span>
                    </div>
                </button>
                </h2>
                <div :id="'collapseLinux'+index" class="accordion-collapse collapse" :aria-labelledby="'headingLinux'+index" data-bs-parent="#accordionLinux">
                <div class="accordion-body">
                    {{ log.message }}
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Home',

    data() {
        return {
            show: false,
            windowsLogs: [],
            linuxLogs: [],
        }
    },

    mounted() {
        this.getLogs()
    },

    methods: {
        getLogs() {
            axios.post('/api/getlogs').then((res) => {
                this.windowsLogs = res.data[0].windowsLogs
                this.linuxLogs = res.data[0].linuxLogs
                console.log(res.data)
          });
        }
    }
}
</script>

<style scoped>

</style>