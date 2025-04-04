import './bootstrap';
import './admin';

const myApp = Vue.createApp({
    data() {
        return {

        };
    },
    mounted() {
        window.addEventListener('load', () => {
            let deleteModalEl = document.getElementById('confirmDeleteModal');
            if(deleteModalEl !== null) {
                deleteModalEl.addEventListener('shown.bs.modal', function (event) {
                    let action = event.relatedTarget.dataset.action;
                    document.getElementById('confirmDeleteForm').setAttribute('action',action);
                });

                deleteModalEl.addEventListener('hidden.bs.modal', function (event) {
                    document.getElementById('confirmDeleteForm').setAttribute('action','#');
                });
            }
        });
    },
    watch: {
    },
    components: {
    },
    computed: {
    },
    methods: {
    },
});

myApp.mount('#app');