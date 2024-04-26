// Function to modify block settings for all blocks
export function removeAlignmentOptions(settings, name) {
	// Check if the block supports alignment and if it's an array
	if (settings.supports && Array.isArray(settings.supports.align)) {
		// Filter out 'left' and 'right' from the alignment options
		settings.supports.align = settings.supports.align.filter(
			(alignment) =>
				alignment !== "left" && alignment !== "right" && alignment !== "center"
		);
	}

	return settings;
}
