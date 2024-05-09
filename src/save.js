import {useBlockProps} from '@wordpress/block-editor';

/**
 * Save function for the Read More Link block.
 *
 * Outputs the selected post as a stylized link.
 */
export default function save({attributes}) {
	const blockProps = useBlockProps.save();

	return (
		attributes.selectedPost ? (
			<p {...blockProps}>
				Read More: <a href={attributes.selectedPost.link} className="dmg-read-more">
				{attributes.selectedPost.title.rendered}
			</a>
			</p>
		) : null
	);
}
