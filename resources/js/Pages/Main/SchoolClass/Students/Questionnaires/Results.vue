<template>
    <MainTemplate>
        <StudentDetailsComponent/>
        <div class="title-section">
            <div class="title">{{ this.studentQuestionnaire.questionnaire.name + ' - ' + this.studentQuestionnaire.questionnaire.type}}</div>
            <Link class="button blue ghost" :href="`/school/${this.school.id}/school-class/${this.schoolClass.id}/student/${this.student.id}/show`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
            <Link class="button blue ghost" :href="`/school/${this.school.id}/school-class/${this.schoolClass.id}/student/${this.student.id}/questionnaire/${this.studentQuestionnaire.id}/get-results`">
                Rezultati
            </Link>
        </div>
        <div class="table-wrap" v-if="this.studentQuestionnaire.answers.length">
            <table>
                <thead>
                    <tr>
                        <th width="45%">Čestica</th>
                        <th class="no-padding-labels">
                            <div class="labels">
                                <div class="label"><div>Nikada</div></div>
                                <div class="label"><div>Vrlo rijetko</div></div>
                                <div class="label"><div>Ponekad</div></div>
                                <div class="label"><div>Često</div></div>
                                <div class="label"><div>Gotovo uvijek</div></div>
                            </div>
                        </th>
                        <th>Dimenzija</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="(answer, i) in this.studentQuestionnaire.answers" :key="answer.id" class="hover">
                    <td>
                        <div class="item">
                            <div class="order">{{(i + 1) + '.'}}</div>
                            <div class="question">{{ answer.item.question }}</div>
                        </div>
                    </td>
                    <td class="no-padding-answers">
                        <div class="answers" v-bind:class="{'reverse' : !answer.item.ascending_order}">
                            <template v-for="(j, k) in 5">
                                <div class="box" v-bind:class="{'selected' : answer.points === k }">{{k}}</div>
                            </template>
                        </div>
                    </td>
                    <td>{{ answer.item.dimension_value }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Upitnik još nije riješen!</div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "@/Shared/MainTemplate.vue";
import StudentDetailsComponent from "@/Shared/StudentDetailsComponent.vue";
export default {
    name: "Results",
    components: {StudentDetailsComponent, MainTemplate},
    props: {
        school: Object,
        schoolClass: Object,
        student: Object,
        studentQuestionnaire: Object
    }
}
</script>

<style scoped>
.no-padding-labels {
    padding: 0 25px;
    height: 80px;
}

.labels {
    display: flex;
    height: 100%;
}

.label {
    width: 46px;
    position: relative;
    display: flex;
    height: 100%;
    justify-content: flex-start;
    user-select: none;
}

.label div {
    width: 80px;
    position: absolute;
    bottom: 30px;
    right: -35px;
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

.answers {
    display: flex;
    justify-content: left;
    gap: 8px;
}

.answers.reverse {
    flex-direction: row-reverse;
}

.box {
    border: 1px solid var(--light-gray);
    font-size: 90%;
    color: var(--gray);
    border-radius: 3px;
    background-color: #FFF;
    user-select: none;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.box.selected {
    background-color: var(--blue);
    color: white;
}
</style>
