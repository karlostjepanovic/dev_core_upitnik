<template>
    <div>
        <div class="title-section">
            <Link class="button blue ghost" href="/admin/questionnaires">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="wrap section">
            <div class="title-section">
                <div class="title">{{ this.questionnaire.name + ' - ' + this.questionnaire.type }}</div>
            </div>
            <div class="section">Uređivanje upitnika je moguće samo ako upitnik nije zaključan.</div>
            <form @submit.prevent="updateQuestionnaire">
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
                        <label for="type" class="required">Vrsta:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <select
                                class="input blue"
                                :class="{'invalid' : formData.errors && formData.errors.type}"
                                id="type"
                                v-model="formData.type">
                                <option value="null">--- odaberite vrstu ---</option>
                                <option value="OM">OM</option>
                                <option value="YP">YP</option>
                            </select>
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.type">{{formData.errors.type}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="target_group" class="required">Ciljana skupina:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <select
                                class="input blue"
                                :class="{'invalid' : formData.errors && formData.errors.target_group}"
                                id="target_group"
                                v-model="formData.target_group">
                                <option value="">--- odaberite ciljanu skupinu ---</option>
                                <option value="M">muške osobe</option>
                                <option value="Ž">ženske osobe</option>
                            </select>
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.target_group">{{formData.errors.target_group}}</div>
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
                <div class="subtitle">Zaključavanje upitnika</div>
            </div>
            <div class="section">
                <p>Želite li zaključati upitnik? Zaključani upitnik više nije moguće uređivati, brisati ili ponovno otključati.</p>
            </div>
            <div class="section">
                <p class="txt-red">Upitnik zaključajte samo onda kada ste sigurni da su svi podatci i čestice za taj upitnik ispravni.</p>
            </div>
            <button type="button" class="button blue ghost" @click="lockQuestionnaire">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M18,20V10H6V20H18M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V10A2,2 0 0,1 6,8H15V6A3,3 0 0,0 12,3A3,3 0 0,0 9,6H7A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,17A2,2 0 0,1 10,15A2,2 0 0,1 12,13A2,2 0 0,1 14,15A2,2 0 0,1 12,17Z" />
                </svg>
                Zaključaj upitnik
            </button>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="subtitle">Brisanje upitnika</div>
            </div>
            <div class="section">
                <p>Želite li obrisati upitnik? Brisanje upitnika je moguće samo ako upitnik nije zaključan.</p>
            </div>
            <button type="button" class="button red ghost" @click="deleteQuestionnaire">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                </svg>
                Obriši upitnik
            </button>
        </div>
    </div>
</template>

<script>
import AdminTemplate from "../AdminTemplate.vue";

export default {
    name: "Edit",
    layout: AdminTemplate,
    props: {
        questionnaire: Object,
    },
    data() {
        return {
            formData:  this.$inertia.form({
                name: this.questionnaire.name,
                type: this.questionnaire.type,
                target_group: this.questionnaire.target_group,
            })
        }
    },
    methods: {
        updateQuestionnaire() {
            this.formData.post(`/admin/questionnaires/${this.questionnaire.id}/update`);
        },
        lockQuestionnaire() {
            this.formData.post(`/admin/questionnaires/${this.questionnaire.id}/lock`);
        },
        deleteQuestionnaire() {
            this.formData.post(`/admin/questionnaires/${this.questionnaire.id}/destroy`);
        }
    },
}
</script>

<style scoped>

</style>
