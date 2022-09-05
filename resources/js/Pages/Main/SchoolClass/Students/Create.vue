<template>
    <div>
        <div class="title-section">
            <Link class="button blue ghost" :href="`/school/${this.school.id}/school-class/${this.schoolClass.id}/set-student`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="section wrap">
            <div class="title-section">
                <div class="title">Pretraži učenika</div>
            </div>
            <form @submit.prevent="searchStudent">
                <div class="form-section">
                    <div class="form-control">
                        <label for="username" class="required">Korisničko ime:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : searchStudentForm.errors && searchStudentForm.errors.username}"
                                   id="username"
                                   v-model="searchStudentForm.username">
                        </div>
                        <div class="error" v-if="searchStudentForm.errors && searchStudentForm.errors.username">{{searchStudentForm.errors.username}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Dodaj učenika
                    </button>
                </div>
            </form>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="title">Novi učenik</div>
            </div>
            <form @submit.prevent="createStudent">
                <div class="form-section">
                    <div class="form-control">
                        <label for="firstname" class="required">Ime:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : newStudentForm.errors && newStudentForm.errors.firstname}"
                                   id="firstname"
                                   v-model="newStudentForm.firstname">
                        </div>
                        <div class="error" v-if="newStudentForm.errors && newStudentForm.errors.firstname">{{newStudentForm.errors.firstname}}</div>
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
                                   :class="{'invalid' : newStudentForm.errors && newStudentForm.errors.lastname}"
                                   id="lastname"
                                   v-model="newStudentForm.lastname">
                        </div>
                        <div class="error" v-if="newStudentForm.errors && newStudentForm.errors.lastname">{{newStudentForm.errors.lastname}}</div>
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
                                   :class="{'invalid' : newStudentForm.errors && newStudentForm.errors.username}"
                                   id="username"
                                   v-model="newStudentForm.username">
                        </div>
                        <div class="error" v-if="newStudentForm.errors && newStudentForm.errors.username">{{newStudentForm.errors.username}}</div>
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
                                   :class="{'invalid' : newStudentForm.errors && newStudentForm.errors.oib}"
                                   id="oib"
                                   v-model="newStudentForm.oib">
                        </div>
                        <div class="error" v-if="newStudentForm.errors && newStudentForm.errors.oib">{{newStudentForm.errors.oib}}</div>
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
                                   :class="{'invalid' : newStudentForm.errors && newStudentForm.errors.email}"
                                   id="email"
                                   v-model="newStudentForm.email">
                        </div>
                        <div class="error" v-if="newStudentForm.errors && newStudentForm.errors.email">{{newStudentForm.errors.email}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Spremi učenika
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import MainTemplate from "../../../../Shared/MainTemplate.vue";

export default {
    name: "Create",
    layout: MainTemplate,
    data() {
        return {
            searchStudentForm: this.$inertia.form({
                username: null
            }),
            newStudentForm: this.$inertia.form({
                firstname: null,
                lastname: null,
                username: null,
                oib: null,
                email: null
            })
        }
    },
    methods: {
        searchStudent() {
            this.searchStudentForm.post(`/school/${this.school.id}/school-class/${this.schoolClass.id}/search`);
        },
        createStudent() {
            this.newStudentForm.post(`/school/${this.school.id}/school-class/${this.schoolClass.id}/create`);
        }
    },
    props: {
        school: Object,
        schoolClass: Object,
    }
}
</script>

<style scoped>

</style>
