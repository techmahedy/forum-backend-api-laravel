<template>
 <div style="margin-top:20px; margin-bottom:20px;">
    <v-card
        class="mx-auto"
        color="grey"
        dark
        max-width="700"
    >
    <v-card-title>
        <router-link :to="data.path">{{ data.title }}</router-link>
    </v-card-title>

    <v-card-text class="text-h5 font-weight-bold">{{ data.details }}</v-card-text>

    <v-card-actions>
      <v-list-item class="grow">
        <v-list-item-avatar color="grey darken-3">
          <v-img
            class="elevation-6"
            alt=""
            src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
          ></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title>{{ data.created_by }}</v-list-item-title>
        </v-list-item-content>

        <v-row
          align="center"
          justify="end"
        >
          <v-icon class="mr-1">
            mdi-heart
          </v-icon>
          <span class="subheading mr-2">{{ data.replies_count }}</span>
        </v-row>
      </v-list-item>
    </v-card-actions>
  </v-card>
 </div>
</template>
<script>
export default {
   props: ['data']
}
</script>
