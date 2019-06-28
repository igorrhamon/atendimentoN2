<!-- ./resources/assets/js/components/Home.vue -->
<template>
    <div class="container">

    </div>
</template>

<script>
    export default {
        data() {
            return {
                newPostTitle: "",
                newPostDesc: ""
            }
        },
        created() {
            this.listenForChanges();
        },
        methods: {

            listenForChanges() {

                Echo.channel('my-channel')
                    .listen('formSender', (e) => {
                        if (!Notification) {
                            alert('Desktop notifications not available in your browser. Try Chromium.');
                            return;
                        }

                        if (Notification.permission !== "granted")
                            Notification.requestPermission();
                        else {
                            var notification = new Notification('Notification title', {
                                icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
                                body: "Hey there! You've been notified!",
                            });

                            notification.onclick = function () {
                                window.open("http://stackoverflow.com/a/13328397/1269037");
                            };

                        }
                    })
            }
        }
    }
</script>