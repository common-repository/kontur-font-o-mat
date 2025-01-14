/**
 * WordPress dependencies
 */
import { BlockFormatControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarItem, DropdownMenu, createSlotFill } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { textColor } from '@wordpress/icons';

const { Fill, Slot } = createSlotFill( 'FontWeightDropdownControls' );
const DropdownControls = Fill;
DropdownControls.Slot = Slot;

const Dropdown = () => {
	return (
		<BlockFormatControls>
			<ToolbarGroup>
				<DropdownControls.Slot>
					{
						fills => <ToolbarItem>
							{ ( toolbarItemProps ) => (
								<DropdownMenu
									toggleProps={ toolbarItemProps }
									icon={ textColor }
									label={ __( 'Font weight', 'kontur-font-o-mat' ) }
									controls={ fills.map( ([ { props } ]) => props ) }
								/>
							) }
						</ToolbarItem>
					}
				</DropdownControls.Slot>
			</ToolbarGroup>
		</BlockFormatControls>
	);
};

export { Dropdown, DropdownControls };
