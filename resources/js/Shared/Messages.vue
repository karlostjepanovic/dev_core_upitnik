<template>
    <div class="alert-box red" v-if="$page.props.flash.error && show">
        <div class="message">{{ $page.props.flash.error }}</div>
        <div class="close-btn" @click="show = false">
            <svg style="width:24px;height:24px" viewBox="0 -2 24 24">
                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
            </svg>
        </div>
    </div>
    <div class="alert-box green" v-if="$page.props.flash.success && show">
        <div class="message">{{ $page.props.flash.success }}</div>
        <div class="close-btn" @click="show = false">
            <svg style="width:24px;height:24px" viewBox="0 -2 24 24">
                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
            </svg>
        </div>
    </div>
    <div class="alert-box yellow" v-if="$page.props.flash.warning && show">
        <div class="message">{{ $page.props.flash.warning }}</div>
        <div class="close-btn" @click="show = false">
            <svg style="width:24px;height:24px" viewBox="0 -2 24 24">
                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    name: "Messages",
    data() {
        return {
            show: true,
        }
    },
    /*watch: {
        '$page.props.flash': {
            handler() {
                this.show = true
            },
            deep: true,
        },
    },*/
}
</script>

<style scoped>
.alert-box {
    padding: .5em;
    border-radius: .25em;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.alert-box.red {
    color: var(--dark-red);
    border: 1px solid var(--red);
    background: var(--second-red);
}

.alert-box.green {
    color: var(--dark-green);
    border: 1px solid var(--green);
    background: var(--second-green);
}

.alert-box.yellow {
    color: var(--dark-yellow);
    border: 1px solid var(--yellow);
    background: var(--second-yellow);
}

.message {
    user-select: none;
}

.close-btn {
    cursor: pointer;
}
</style>
