<template>
    <MainTemplate>
        <template v-if="formData.answers.length">
            <table class="sticky">
                <thead>
                    <tr>
                        <th width="55%">Pitanje</th>
                        <th class="no-padding-labels">
                            <div class="labels">
                                <div class="label"><div>Nikada</div></div>
                                <div class="label"><div>Vrlo rijetko</div></div>
                                <div class="label"><div>Ponekad</div></div>
                                <div class="label"><div>Često</div></div>
                                <div class="label"><div>Gotovo uvijek</div></div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <form @submit.prevent="submitAnswers">
                <div class="form-section">
                    <table>
                        <tbody>
                        <tr v-for="(answer, i) in formData.answers" :key="answer.id" class="hover">
                            <td width="55%">
                                <div class="item">
                                    <div class="order">{{(i + 1) + '.'}}</div>
                                    <div class="question">
                                        <div>
                                            {{ answer.item.question }}
                                        </div>
                                        <div class="error" v-if="formData.errors && formData.errors['answers.'+i+'.value']">{{formData.errors['answers.'+i+'.value']}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="no-padding-answers">
                                <boxes-component v-model="answer.value" :asc="!!answer.item.ascending_order"></boxes-component>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-section txt-center">
                    <button
                        type="submit"
                        class="blue w-5">
                        Spremi odgovore
                    </button>
                </div>
            </form>
        </template>
    </MainTemplate>
</template>

<script>
import MainTemplate from "@/Shared/MainTemplate.vue";
import BoxesComponent from "@/Pages/Main/Questionnaires/BoxesComponent.vue";
export default {
    name: "Show",
    components: {BoxesComponent, MainTemplate},
    data() {
        return {
            formData:  this.$inertia.form({
                answers: [],
            }),
        }
    },
    methods: {
        submitAnswers() {
            this.formData.post(`/questionnaire/${this.studentQuestionnaire.id}/submit`);
        }
    },
    created() {
        this.studentQuestionnaire.questionnaire.items.forEach(item => {
            this.formData.answers.push({
                item: item,
                value: null,
            })
        });
    },
    props: {
        studentQuestionnaire: Object
    }
}
</script>

<style scoped>
.sticky {
    position: sticky;
    top: 60px;
    z-index: 50;
}

.sticky thead {
    background-color: var(--gray);
}

.sticky thead * {
    color: white;
}

.no-padding-labels {
    padding: 0 25px;
    height: 90px;
}

.labels {
    display: flex;
    height: 100%;
}

.label {
    width: 60px;
    position: relative;
    display: flex;
    height: 100%;
    justify-content: flex-start;
    user-select: none;
}

.label div {
    width: 80px;
    position: absolute;
    bottom: 40px;
    right: -25px;
    transform: rotate(-50deg);
    font-size: 90%;
}

.item {
    display: flex;
    align-items: flex-start;
    gap: 5px;
}

.item .order {
    font-weight: bold;
}

.no-padding-answers {
    padding: 0 25px;
}
</style>
