<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron">
                <h1 class="display-4">Awesome Contact Form</h1>
                <p class="lead">This is a simple example of push notification implementation of a "Success" message using Laravel + Vue.js + Pusher</p>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input v-model="newMsgName" id="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input v-model="newMsgEmail" id="email" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea v-model="newMsgDesc" id="description" rows="8" class="form-control"></textarea>
                </div>
                <button @click="addMessage(newMsgName, newMsgEmail, newMsgDesc)"
                        :class="{disabled: (!newMsgName || !newMsgEmail || !newMsgDesc)}"
                        class="btn btn-block btn-success">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newMsgName: "",
                newMsgEmail: "",
                newMsgDesc: "",
            }
        },
        created() {
            this.listenForChanges();
        },
        methods: {
            addMessage(msgName, msgEmail, msgDesc) {
                // check if entries are not empty
                if(!msgName || !msgEmail || !msgDesc)
                    return;

                // make API to save message
                axios.post('/api/message', {
                    name: msgName, email: msgEmail, description: msgDesc
                }).then( response => {
                    if(response.data) {
                        this.newMsgName = this.newMsgEmail = this.newMsgDesc = "";
                    }
                })
            },
            listenForChanges() {
                Echo.channel('contact-form')
                    .listen('MessagePublished', post => {
                        if (! ('Notification' in window)) {
                            alert('Web Notification is not supported');
                            return;
                        }

                        Notification.requestPermission( permission => {
                            let notification = new Notification('Awesome Website', {
                                body: post.message,
                                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                            });

                            // link to page on clicking the notification
                            notification.onclick = () => {
                                window.open(window.location.href);
                            };
                        });
                    })
            }
        }
    }
</script>