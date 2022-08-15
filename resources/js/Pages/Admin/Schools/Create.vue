<template>
    <div>
        <div class="title-section">
            <Link class="button blue ghost" href="/admin/schools">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="title">Nova škola</div>
            </div>
            <form @submit.prevent="createSchool">
                <div class="form-section">
                    <div class="form-control">
                        <label for="name" class="required">Naziv:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.name}"
                                   id="name"
                                   v-model="formData.name">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.name">{{formData.errors.name}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="address" class="required">Adresa:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.address}"
                                   id="address"
                                   v-model="formData.address">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.address">{{formData.errors.address}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="place" class="required">Mjesto:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.place}"
                                   id="place"
                                   v-model="formData.place">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.place">{{formData.errors.place}}</div>
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
                        <label for="supervisor" class="required">Odgovorna osoba:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <select
                                class="input blue"
                                :class="{'invalid' : formData.errors && formData.errors.supervisor}"
                                id="supervisor"
                                v-model="formData.supervisor">
                                <option value="null">--- odaberite odgovornu osobu ---</option>
                                <option v-for="user in users" :value="user.id">{{ user.lastname + ' ' + user.firstname}}</option>
                            </select>
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.supervisor">{{formData.errors.supervisor}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Spremi školu
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
                name: null,
                address: null,
                place: null,
                oib: null,
                supervisor: null
            })
        }
    },
    methods: {
        createSchool() {
            this.formData.post(`/admin/schools/create`);
        }
    },
    props: {
        users: Array,
    },
}
</script>

<style scoped>

</style>
