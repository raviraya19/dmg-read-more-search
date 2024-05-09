import {registerBlockType} from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import save from './save';

registerBlockType('create-block/dmg-read-more-search', {
	title: 'DMG Read More - Post Search',
	icon: 'search',
	category: 'common',
	attributes: {
		searchQuery: {type: 'string'},
		selectedPost: {type: 'object'},
	},

	edit: Edit, // Assign the editor component
	save, // Assign the save function
});
