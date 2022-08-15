<template>
    <div class="interface">
        <div class="waves">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3479B6" fill-opacity="1" d="M0,96L30,122.7C60,149,120,203,180,208C240,213,300,171,360,170.7C420,171,480,213,540,197.3C600,181,660,107,720,74.7C780,43,840,53,900,90.7C960,128,1020,192,1080,208C1140,224,1200,192,1260,165.3C1320,139,1380,117,1410,106.7L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
        </div>
        <div class="login-wrap">
            <div class="login-box">
                <div class="login-title">CORE upitnik</div>
                <div class="login-subtitle">Prijava u sustav</div>
                <Messages />
                <form method="post" @submit.prevent="loginAction">
                    <div class="form-section w-10">
                        <div class="form-control">
                            <label for="username">Korisničko ime:</label>
                        </div>
                        <div class="form-control">
                            <div class="field">
                                <input type="text"
                                       class="blue"
                                       :class="{'invalid' : formData.errors && formData.errors.username}"
                                       id="username"
                                       v-model="formData.username"
                                       autofocus="autofocus">
                            </div>
                            <div class="error" v-if="formData.errors && formData.errors.username">{{formData.errors.username}}</div>
                        </div>
                    </div>
                    <div class="form-section w-10">
                        <div class="form-control">
                            <label for="password">Lozinka:</label>
                        </div>
                        <div class="form-control">
                            <div class="field">
                                <input type="password"
                                       class="blue"
                                       :class="{'invalid' : formData.errors && formData.errors.password}"
                                       id="password"
                                       v-model="formData.password">
                            </div>
                            <div class="error" v-if="formData.errors && formData.errors.password">{{formData.errors.password}}</div>

                        </div>
                    </div>
                    <div class="form-section center">
                        <button
                            type="submit"
                            class="blue w-10">
                            Prijavi se
                        </button>
                    </div>
                </form>
            </div>
            <div class="copyright-box">Karlo Stjepanović © 2022.</div>
        </div>
    </div>
</template>

<script>
import Messages from "../Shared/Messages.vue";
export default {
    name: "Login",
    components: {Messages},

    data(){
        return {
            formData:  this.$inertia.form({
                username: null,
                password: null
            })
        }
    },
    methods: {
        loginAction() {
            this.formData.post(`/login`, {
                onSuccess: () => {
                    this.formData.reset();
                },
            });
        }
    },
}
</script>

<style scoped>
.interface {
    background: var(--second-blue);
    height: 100vH;
    width: 100vW;
}
.login-wrap {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: calc(7.5em - 2%);
}

.login-box {
    background: rgba(255, 255, 255, 0.7);
    padding: 2em 2.5em;
    border-radius: .5em;
    min-width: 360px;
    margin: 10px;
}

form {
    display: block;
}

button {
    font-size: 110%;
}

.login-title,
.login-subtitle {
    text-align: center;
    font-weight: bold;
    color: var(--blue);
}

.login-title {
    font-size: 2em;
}

.login-subtitle {
    font-size: 1.25em;
    margin-bottom: 20px;
}

.copyright-box {
    font-size: .75em;
    color: var(--black);
    margin-top: 10px;
    margin-bottom: 5em;
}

@media screen and (max-width: 620px) {
    .login-wrap {
        padding: 5%;
    }
    .login-box {
        width: 100%
    }
}
</style>
