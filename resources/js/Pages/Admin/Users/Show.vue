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
        <div class="wrap section">
            <div class="title-section">
                <div class="title">{{ this.user.firstname + ' ' + this.user.lastname }}</div>
            </div>
            <form @submit.prevent="updateUser">
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
                        Spremi promjene
                    </button>
                </div>
            </form>
        </div>
        <div class="wrap section">
            <div class="title-section">
                <div class="subtitle">Resetiranje lozinke</div>
            </div>
            <div class="section">
                <p>Želite li resetirati lozinku za korisnika? Nova inicijalna lozinka će biti poslana korisniku na njegovu adresu e-pošte.</p>
            </div>
            <button type="button" class="button blue ghost" @click="resetPassword">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M2 12C2 16.97 6.03 21 11 21C13.39 21 15.68 20.06 17.4 18.4L15.9 16.9C14.63 18.25 12.86 19 11 19C4.76 19 1.64 11.46 6.05 7.05C10.46 2.64 18 5.77 18 12H15L19 16H19.1L23 12H20C20 7.03 15.97 3 11 3C6.03 3 2 7.03 2 12Z" />
                </svg>
                Resetiraj lozinku
            </button>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="subtitle">Brisanje korisnika</div>
            </div>
            <div class="section">
                <p>Želite li obrisati korisnika? Brisanje je moguće jedino ako za tog korisnika ne postoje vezani podatci.</p>
            </div>
            <button type="button" class="button red ghost" @click="deleteUser">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                </svg>
                Obriši korisnika
            </button>
        </div>
    </div>
</template>

<script>
import AdminTemplate from "../AdminTemplate.vue";

export default {
    name: "Edit",
    layout: AdminTemplate,
    data() {
        return {
            formData:  this.$inertia.form({
                firstname: this.user.firstname,
                lastname: this.user.lastname,
                username: this.user.username,
                oib: this.user.oib,
                email: this.user.email
            })
        }
    },
    methods: {
        updateUser() {
            this.formData.post(`/admin/users/${this.user.id}/update`);
        },
        resetPassword() {
            this.$inertia.post(`/admin/users/${this.user.id}/reset-password`);
        },
        deleteUser() {
            this.$inertia.post(`/admin/users/${this.user.id}/destroy`);
        }
    },
    props: {
        user: Object,
    },
}
</script>

<style scoped>

</style>
