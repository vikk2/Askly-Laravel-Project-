<!-- <template>
  <div class="">
    
    <div class="flex space-x-2 mb-4">
      <button
        :class="buttonClass(editor.isActive('bold'))"
        @click="editor.chain().focus().toggleBold().run()"
        type="button"
        aria-label="Toggle Bold"
      >
        <strong>B</strong>
      </button>

      <button
        :class="buttonClass(editor.isActive('italic'))"
        @click="editor.chain().focus().toggleItalic().run()"
        type="button"
        aria-label="Toggle Italic"
      >
        <em>I</em>
      </button>

      <button
        :class="buttonClass(editor.isActive('heading', { level: 1 }))"
        @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
        type="button"
        aria-label="Toggle Heading 1"
      >
        H1
      </button>

      <button
        :class="buttonClass(editor.isActive('heading', { level: 2 }))"
        @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
        type="button"
        aria-label="Toggle Heading 2"
      >
        H2
      </button>

    <button
        :class="buttonClass(editor.isActive('bulletList'))"
        @click="editor.chain().focus().toggleBulletList().run()"
        >
        • List
    </button>
    </div>

    
    <editor-content
      :editor="editor"
      class="border border-gray-400 rounded-xl p-4 min-h-[200px] prose"
    />

    <input type="hidden" :value="editor.getHTML()" name="body" />
  </div>
</template>

<script setup>
import { onBeforeUnmount, ref } from 'vue'
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = new Editor({
  extensions: [StarterKit],
  content: '',
})


onBeforeUnmount(() => {
  editor.destroy()
})


function buttonClass(active) {
  return [
    'px-3 py-1 rounded-md border',
    active
      ? 'bg-blue text-white'
      : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100',
  ].join(' ')
}
</script>

<style scoped>

.prose {
  max-width: none;
}

</style> -->

<script setup>
import { onBeforeUnmount, ref } from 'vue'
import { useEditor, EditorContent } from '@tiptap/vue-3'
import Underline from '@tiptap/extension-underline'
import StarterKit from '@tiptap/starter-kit'
import Link from '@tiptap/extension-link'
import BoldIcon from 'vue-material-design-icons/FormatBold.vue';
import ItalicIcon from 'vue-material-design-icons/FormatItalic.vue';
import UnderlineIcon from 'vue-material-design-icons/FormatUnderline.vue';
import Header1Icon from 'vue-material-design-icons/FormatHeader1.vue';
import Header2Icon from 'vue-material-design-icons/FormatHeader2.vue';
import Header3Icon from 'vue-material-design-icons/FormatHeader3.vue';
import bulletListIcon from 'vue-material-design-icons/FormatListBulleted.vue';
import numberedListIcon from 'vue-material-design-icons/FormatListNumbered.vue';
import CodeIcon from 'vue-material-design-icons/CodeTags.vue';
import UndoIcon from 'vue-material-design-icons/Undo.vue';
import RedoIcon from 'vue-material-design-icons/Redo.vue';
import LinkIcon from 'vue-material-design-icons/Link.vue';
import Placeholder from '@tiptap/extension-placeholder'


const props = defineProps({
  initialContent: {
    type: String,
    default: '',
  }
})

const editor = useEditor({
    editorProps: {
    attributes: {
      class: 'border border-gray-400 p-4 rounded-xl min-h-[200px] max-h-[12rem] overflow-y-auto prose max-w-none', 
    },
  },
    content:  props.initialContent ||'',
    extensions: [StarterKit, 
        Placeholder.configure({
          placeholder: 'Start writing your article here...',
          showOnlyWhenEditable: true,
          showOnlyCurrent: false,
        }),
        Underline,
        Link.configure({
          openOnClick: true,
          defaultProtocol: 'https',
        }),
      ],
  })
  
  const showLinkModal = ref(false)
  const linkInput = ref('')
  const isEditingLink = ref(false)

  const openLinkModal = () => {
    linkInput.value = editor.value?.getAttributes('link').href || ''
    isEditingLink.value = !!linkInput.value
    showLinkModal.value = true
  }

  const applyLink = () => {
    if (linkInput.value === '') {
      editor.value?.chain().focus().unsetLink().run()
    } else {
      editor.value?.chain().focus().extendMarkRange('link').setLink({ href: linkInput.value }).run()
    }
    showLinkModal.value = false
  }

  onBeforeUnmount(() => {
  editor.destroy()
})

</script>



<template>
  <div class="container w-full">
    <section
      v-if="editor"
      class="buttons flex flex-wrap items-center gap-3 border border-gray-400 p-3 mb-1 rounded-xl"
    >
      
      <div class="flex items-center gap-2 border-r pr-3 border-gray-300">
        <button
          type="button"
          @click="editor.chain().focus().toggleBold().run()"
          :disabled="!editor.can().chain().focus().toggleBold().run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('bold') }"
          class="p-1"
        >
          <BoldIcon title="Bold (Ctrl + B)" />
        </button>

        <button
          type="button"
          @click="editor.chain().focus().toggleItalic().run()"
          :disabled="!editor.can().chain().focus().toggleItalic().run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('italic') }"
          class="p-1"
        >
          <ItalicIcon title="Italic (Ctrl + I)" />
        </button>

        <button
          type="button"
          @click="editor.chain().focus().toggleUnderline().run()"
          :disabled="!editor.can().chain().focus().toggleUnderline().run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('underline') }"
          class="p-1"
        >
          <UnderlineIcon title="Underline (Ctrl + U)" />
        </button>
      </div>

      
      <div class="flex items-center gap-2 border-r pr-3 border-gray-300">
        <button
          type="button"
          @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('heading', { level: 1 }) }"
          class="p-1"
        >
          <Header1Icon title="Header 1" />
        </button>

        <button
          type="button"
          @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('heading', { level: 2 }) }"
          class="p-1"
        >
          <Header2Icon title="Header 2" />
        </button>

        <button
          type="button"
          @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('heading', { level: 3 }) }"
          class="p-1"
        >
          <Header3Icon title="Header 3" />
        </button>
      </div>

      
      <div class="flex items-center gap-2 border-r pr-3 border-gray-300">
        <button
          type="button"
          @click="editor.chain().focus().toggleBulletList().run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('bulletList') }"
          class="p-1"
        >
          <bulletListIcon title="Bulleted List" />
        </button>

        <button
          type="button"
          @click="editor.chain().focus().toggleOrderedList().run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('orderedList') }"
          class="p-1"
        >
          <numberedListIcon title="Numbered List" />
        </button>
      </div>

      
      <div class="flex items-center gap-2 border-r pr-3 border-gray-300">
        <button
          type="button"
          @click="editor.chain().focus().toggleCodeBlock().run()"
          :class="{ 'bg-gray-200 rounded-lg': editor.isActive('codeBlock') }"
          class="p-1"
        >
          <CodeIcon title="Code Block" />
        </button>

        <button type="button"
        @click="openLinkModal" :class="{ 'bg-gray-200 rounded-lg': editor.isActive('link') }"
        class="p-1">
          <LinkIcon title="Insert link" />
        </button>
      </div>

      

      
      <div class="flex items-center gap-2">
        <button
          type="button"
          @click="editor.chain().focus().undo().run()"
          :disabled="!editor.can().chain().focus().undo().run()"
          class="p-1 disabled:text-gray-400"
        >
          <UndoIcon title="Undo" />
        </button>

        <button
          type="button"
          @click="editor.chain().focus().redo().run()"
          :disabled="!editor.can().chain().focus().redo().run()"
          class="p-1 disabled:text-gray-400"
        >
          <RedoIcon title="Redo" />
        </button>
      </div>
    </section>

    <editor-content :editor="editor" />
    <input v-if="editor" type="hidden" :value="editor.getHTML()" name="body" placeholder="Write your content here"/>

    <teleport to="body">
      <div v-if="showLinkModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-[#F9FAFB] p-4 rounded-xl shadow-md w-[300px] space-y-3">
          <h2 class="text-lg font-semibold">{{ isEditingLink ? 'Edit Link' : 'Insert Link' }}</h2>
          <input
            v-model="linkInput"
            type="url"
            placeholder="Search or paste a link"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring"
          />
          <div class="flex justify-end space-x-2">
            <button @click="showLinkModal = false" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
            <button @click="applyLink" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Apply</button>
          </div>
        </div>
      </div>
    </teleport>
  </div>
</template>

<style scoped>

  ::v-deep(li p){
    margin-top: 0.25em;
    margin-bottom: 0.25em;
  }

  ::v-deep(p) {
    font-size: 1rem;
    line-height: 1.75;
    margin-top: 0.75em;
    margin-bottom: 0.75em;
    color: #374151; /* Tailwind's slate-700 */
  }
  
  ::v-deep(h1) {
      font-size: 1.25rem;
      font-weight: 700; /* bold */
      margin-top: 1.5em;
      margin-bottom: 0.5em;
    }
  ::v-deep(h2) {
    font-size: 1.1rem;
    font-weight: 600; /* semi-bold */
    margin-top: 1.25em;
    margin-bottom: 0.4em;
  }
  ::v-deep(h3) {
    font-size: 1rem;
    font-weight: 500; /* medium */
    margin-top: 1em;
    margin-bottom: 0.3em;
  }
  ::v-deep(.tiptap p.is-editor-empty:first-child::before ){
    color: #adb5bd;
    content: attr(data-placeholder);
    float: left;
    height: 0;
    pointer-events: none;
  }
</style>
