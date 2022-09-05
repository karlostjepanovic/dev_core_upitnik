<template>
    <div class="student-details-wrap">
        <div class="icon">
            <svg style="width:154px;height:154px" viewBox="4 0 24 24">
                <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
            </svg>
        </div>
        <div class="details">
            <div class="section">
                <div class="label">Ime i prezime</div>
                <div class="text">{{ student.user.firstname + ' ' + student.user.lastname }}</div>
            </div>
            <div class="section">
                <div class="label">OIB</div>
                <div class="text">{{ student.user.oib }}</div>
            </div>
            <div class="section">
                <div class="label">Adresa e-pošte</div>
                <div class="text">{{ student.user.email }}</div>
            </div>
            <div class="section">
                <div class="label">Korisničko ime</div>
                <div class="text">{{ student.user.username }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentDetailsComponent",
    computed: {
        student: function () {
            return this.$page.props.student;
        }
    }
}
</script>

<style scoped>
.student-details-wrap {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
    margin-bottom: 1em;
}

.details {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-column-gap: 3em;
    grid-row-gap: 1em;
}

.label {
    font-weight: bold;
}
</style>
