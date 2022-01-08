const language_options_html_string = '<option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="en">English</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="rw">Kinyarwanda</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="or">Odia (Oriya)</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="tt">Tatar</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="tk">Turkmen</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="ug">Uyghur</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option><option value="he">Hebrew</option><option value="zh">Chinese (Simplified)</option>'
const style_string = "#translation-widget{position:fixed;right:1em;bottom:1em;background-color:white;border:4.33px solid gainsboro;padding:2em;}#lang{margin:0.75em;padding: 0.5em;border: 2.33px solid black;}#get-translation{background-color:black;color:white;font-weight:800;padding:0.75em;margin:0.5em;}"

const wrapper = document.createElement('div')
const style_tag = document.createElement('style')
const section = document.createElement('section')
const select = document.createElement('select')
const button = document.createElement('button')
const label = document.createElement('label')

wrapper.style.position = 'relative'
style_tag.innerText = style_string
section.id = 'translation-widget'
select.id = 'lang'
select.innerHTML = language_options_html_string
button.id = 'get-translation'
label.setAttribute('for',select.id)
label.style.fontWeight = '800'

label.appendChild( document.createTextNode('choose language'))
button.appendChild( document.createTextNode('GET TRANSLATION'))
section.appendChild(label)
section.appendChild(document.createElement('br'))
section.appendChild(select)
section.appendChild(document.createElement('br'))
section.appendChild(button)
wrapper.appendChild(style_tag)
wrapper.appendChild(section)

document.body.insertBefore(wrapper, document.body.childNodes[0])

button.addEventListener('click', textnode_translate)

function textnode_translate() {

  const dom_obj = textnode_audit(document.body)
  let lang = document.querySelector('#translation-widget').querySelector('#lang').value

  strip_textnodes(dom_obj.text_els, dom_obj.text_nodes)

  translate_text(dom_obj.text_strs, lang, dom_obj.text_els, dom_obj.text_nodes)
}

select.addEventListener('focus', function () {
  section.style.borderColor = "orange"
  select.style.borderColor = "orange"
})

select.addEventListener('blur', function () {
  section.style.borderColor = "gainsboro"
  select.style.borderColor = "black"
})

if (document.querySelector('#translate-cta')) {
  document.querySelector('#translate-cta').addEventListener('click', () => {
    select.focus()
  })
}
