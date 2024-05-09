import {InspectorControls, useBlockProps} from '@wordpress/block-editor';
import {PanelBody, TextControl} from '@wordpress/components';
import {__} from '@wordpress/i18n';
import {useState, useEffect} from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

/**
 * Editor component for the Read More Link block.
 *
 * Allows users to search and select posts to display as links.
 */
function Editor({attributes, setAttributes}) {

	// State to hold the fetched posts.
	const [searchResults, setSearchResults] = useState([]);

	const handleSearch = (term) => {
		setAttributes({searchQuery: term});
	};

	const selectPost = (post) => {
		setAttributes({selectedPost: post});
	}

	// Effect to fetch posts based on the search term.
	useEffect(() => {
		if (attributes.searchQuery) {
			apiFetch({path: `/wp/v2/posts?search=${attributes.searchQuery}`})
				.then((posts) => {
					setSearchResults(posts);
				})
				.catch((error) => {
					console.error("Error fetching posts:", error);
					setSearchResults([]); // Clear on error
				});
		} else {
			setSearchResults([]);
		}
	}, [attributes.searchQuery]);

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Post Search Settings')}>
					<TextControl
						label={__('Search Posts')}
						value={attributes.searchQuery || ''}
						onChange={handleSearch}
					/>
					{searchResults.length > 0 && (
						<div className="dmg-search-results">
							<ul>
								{searchResults.map((post) => (
									<li key={post.id}>
										<button onClick={() => selectPost(post)}>
											{post.title.rendered}
										</button>
									</li>
								))}
							</ul>
						</div>
					)}
				</PanelBody>
			</InspectorControls>
			<div>
				{attributes.selectedPost && (
					<p><strong>Selected Post:</strong> {attributes.selectedPost.title.rendered}</p>
				)}
			</div>
		</>
	);
}

export default Editor;
