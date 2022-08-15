<template>
    <div>
        <div class="title-section">
            <Link class="button blue ghost" href="/admin/users">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="title">Novi korisnik</div>
            </div>
            <form @submit.prevent="createUser">
                <div class="form-section">
                    <div class="form-control">
                        <label for="firstname" class="required">Ime:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.firstname}"
                                   id="firstname"
                                   v-model="formData.firstname">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.firstname">{{formData.errors.firstname}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="lastname" class="required">Prezime:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.lastname}"
                                   id="lastname"
                                   v-model="formData.lastname">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.lastname">{{formData.errors.lastname}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="username" class="required">Korisničko ime:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.username}"
                                   id="username"
                                   v-model="formData.username">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.username">{{formData.errors.username}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="oib" class="required">OIB:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.oib}"
                                   id="oib"
                                   v-model="formData.oib">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.oib">{{formData.errors.oib}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="email" class="required">Adresa e-pošte:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.email}"
                                   id="email"
                                   v-model="formData.email">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.email">{{formData.errors.email}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Spremi korisnika
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import AdminTemplate from "../AdminTemplate.vue";

export default {
    name: "Create",
    layout: AdminTemplate,
    data() {
        return {
            formData:  this.$inertia.form({
                firstname: null,
                lastname: null,
                username: null,
                oib: null,
                email: null
            })
        }
    },
    methods: {
        createUser() {
            this.formData.post(`/admin/users/create`);
        }
    }
}
</script>

<style scoped>

</style>
