import './bootstrap';
import './custom';

import { createApp } from 'vue'
import TiptapEditor from './components/TiptapEditor.vue'

const el = document.getElementById('app');
if (el) {
  const app = createApp({});
  app.component('tiptap-editor', TiptapEditor);
  app.mount(el);
}