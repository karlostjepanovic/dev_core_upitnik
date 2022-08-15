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
        <div class="wrap section">
            <div class="title-section">
                <div class="title">{{ this.school.name + ', ' + this.school.place }}</div>
            </div>
            <form @submit.prevent="updateSchool">
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
                        Spremi promjene
                    </button>
                </div>
            </form>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="subtitle">Brisanje škole</div>
            </div>
            <div class="section">
                <p>Želite li obrisati korisnika? Brisanje je moguće jedino ako za tu školu ne postoje vezani podatci.</p>
            </div>
            <button type="button" class="button red ghost" @click="deleteSchool">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                </svg>
                Obriši školu
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
                name: this.school.name,
                address: this.school.address,
                place: this.school.place,
                oib: this.school.oib,
                supervisor: this.school.supervisor_id
            })
        }
    },
    methods: {
        updateSchool() {
            this.formData.post(`/admin/schools/${this.school.id}/update`);
        },
        deleteSchool() {
            this.$inertia.post(`/admin/schools/${this.school.id}/destroy`);
        }
    },
    props: {
        school: Object,
        users: Array
    },
}
</script>

<style scoped>

</style>
