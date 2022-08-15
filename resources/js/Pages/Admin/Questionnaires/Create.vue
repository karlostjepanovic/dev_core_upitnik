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
        <div class="wrap">
            <div class="title-section">
                <div class="title">Novi upitnik</div>
            </div>
            <form @submit.prevent="createQuestionnaire">
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
                        Spremi upitnik
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
                type: null,
                target_group: '',
            })
        }
    },
    methods: {
        createQuestionnaire() {
            this.formData.post(`/admin/questionnaires/create`);
        }
    }
}
</script>

<style scoped>

</style>
