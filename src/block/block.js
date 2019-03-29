import './style.scss';
import './editor.scss';

const {__} = wp.i18n;
const {registerBlockType} = wp.blocks;
const { RichText, Text } = wp.editor;
const textAlignments = [
	'left', 'center', 'right'
];

const el = wp.element.createElement;
const iconEl = el('svg', { width: 128, height: 128, viewBox: "0 0 128 128" },
	el('rect', { x: 0, y: 0, width: 128, height: 128, stroke: "white" }),
	el('path', { d: "M41.7607 39.0615H52.8432V60.866L73.2637 39.0615H86.6547L66.1434 60.2237L87.5885 88.9388H74.2753L58.66 67.706L52.8432 73.6982V88.9388H41.7607V39.0615Z", fill: "white" })
);

registerBlockType('klarity/klarity-read-more-block', {
	title: __('Read more'),
	icon: iconEl,
	category: 'layout',
	attributes: {
		introBlock: {
			type: 'string',
			default: ''
		},
		contentBlock: {
			type: 'string',
			default: ''
		},
		textAlignment: {
			type: 'string',
			default: textAlignments[0]
		}
	},
	edit({ attributes, className, setAttributes }) {
		const setTextAlignment = event => {
			const selected = event.target.querySelector('option:checked');
			setAttributes({textAlignment: selected.value});
			event.preventDefault();
		};
		return<div>
			<label>Text alignment</label>
			<select value={attributes.textAlignment} onChange={ setTextAlignment }>
				{textAlignments.map((alignment) => (
					<option value={alignment} selected>{alignment}</option>
				))}
			</select>
			<p>This text will always be visible</p>
			<div class="text-input">
				<RichText
					id="introBlock"
					placeholder="This text will always be visible"
					value={ attributes.introBlock }
        	onChange={ content => setAttributes({ introBlock: content }) } />
				</div>
				<p>This will be hidden behind the read more section</p>
			<div class="text-input">
				<RichText
					id="contentBlock"
					placeholder="This will be hidden behind the read more section"
					value={ attributes.contentBlock }
		    	onChange={ content => setAttributes({ contentBlock: content }) } />
			</div>
			<div class="preview">
					<h5>Show more preview</h5>
					<p dangerouslySetInnerHTML={{__html: attributes.introBlock }}/>
			</div>
		</div>;
	},

	save: props => {
		return null;
	},
});
