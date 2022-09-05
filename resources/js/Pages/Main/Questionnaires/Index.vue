<template>
    <MainTemplate>
        <div class="title-section">
            <div class="title">Odaberite upitnik</div>
        </div>
        <div class="table-wrap" v-if="questionnaires.length">
            <table>
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Vrsta</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="questionnaire in questionnaires" :key="questionnaire.id" class="hover">
                        <td>{{ questionnaire.questionnaire.name }}</td>
                        <td>{{ questionnaire.questionnaire.type }}</td>
                        <td>
                            <div class="link" @click="setQuestionnaire(questionnaire.id)">Odaberi upitnik</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedan upitnik za odabir!</div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "@/Shared/MainTemplate.vue";

export default {
    name: "Index",
    components: {MainTemplate},
    methods: {
        setQuestionnaire(id) {
            this.$inertia.post(`/set-questionnaire/${id}`);
        }
    },
    props: {
        questionnaires: Array
    }
}
</script>

<style scoped>

</style>
