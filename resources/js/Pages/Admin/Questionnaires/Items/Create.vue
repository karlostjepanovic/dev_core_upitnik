<template>
    <div>
        <div class="title-section">
            <div class="title">{{ this.questionnaire.name + ' - ' + this.questionnaire.type }}</div>
            <Link class="button blue ghost" :href="`/admin/questionnaires/${this.questionnaire.id}/items`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="title">Nova čestica</div>
            </div>
            <div class="section">
                <p>Dodavanje čestica je moguće jedino ako upitnik za odabranu česticu nije zaključan.</p>
            </div>
            <form @submit.prevent="createItem">
                <div class="form-section">
                    <div class="form-control">
                        <label for="question" class="required">Pitanje:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.question}"
                                   id="question"
                                   v-model="formData.question">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.question">{{formData.errors.question}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="dimension" class="required">Dimenzija:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <select
                                class="input blue"
                                :class="{'invalid' : formData.errors && formData.errors.dimension}"
                                id="dimension"
                                v-model="formData.dimension">
                                <option value="">--- odaberite dimenziju ---</option>
                                <option value="W">W - subjektivna dobrobit</option>
                                <option value="P">P - problemi/simptomi</option>
                                <option value="F">F - svakodnevno funkcioniranje</option>
                                <option value="R">R - rizik</option>
                            </select>
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.dimension">{{formData.errors.dimension}}</div>
                    </div>
                </div>
                <div class="form-section w-10">
                    <div class="form-control">
                        <label for="ascending_order" class="required">Redoslijed odgovora:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <select
                                class="input blue"
                                :class="{'invalid' : formData.errors && formData.errors.ascending_order}"
                                id="dimension"
                                v-model="formData.ascending_order">
                                <option value="">--- odaberite redoslijed odgovora ---</option>
                                <option :value="true">uzlazno</option>
                                <option :value="false">silazno</option>
                            </select>
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.ascending_order">{{formData.errors.ascending_order}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Spremi česticu
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import AdminTemplate from "../../AdminTemplate.vue";

export default {
    name: "Create",
    layout: AdminTemplate,
    props: {
        questionnaire: Object,
    },
    data() {
        return {
            formData:  this.$inertia.form({
                question: null,
                dimension: '',
                ascending_order: '',
            })
        }
    },
    methods: {
        createItem() {
            this.formData.post(`/admin/questionnaires/${this.questionnaire.id}/items/create`);
        }
    }
}
</script>

<style scoped>

</style>
