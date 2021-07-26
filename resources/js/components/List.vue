<template>
  <div class="bg-gray-300 rounded-sm p-2 mr-2 card_list">
    <div class="flex justify-between">
      <div class="text-gray-800 pl-2 pb-2 font-bold">{{ card_list.title }}</div>
    </div>

    <Card
      v-for="card in card_list.cards"
      :key="card.id"
      :card="card"
      @deleted="$emit('card-deleted', {...$event, cardListId: card_list.id})"
      @updated="$emit('card-updated', {...$event, cardListId: card_list.id})"
    ></Card>

    <CardAddEditor
      v-if="editing"
      @closed="editing=false"
      :card_list="card_list"
      @added="$emit('card-added', {...$event, cardListId: card_list.id})"
    ></CardAddEditor>
    <CardAddButton v-if="!editing && canAddCard" @click="editing=true"></CardAddButton>
  </div>
</template>

<script>
import Card from "./Card";
import CardAddButton from "./CardAddButton";
import CardAddEditor from "./CardAddEditor";
import { mapState } from "vuex";

export default {
  components: { Card, CardAddButton, CardAddEditor },
  props: {
    card_list: Object
  },
  data() {
    return {
      editing: false
    };
  },
  computed: mapState({
    canAddCard(state) {
      return this.card_list.board.user.id == state.user.id;
    }
  })
};
</script>

<style scoped>
.card_list {
  width: 250px;
  min-width: 250px;
}
</style>
