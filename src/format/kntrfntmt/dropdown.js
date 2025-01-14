/**
 * WordPress dependencies
 */
import { BlockFormatControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarItem, DropdownMenu, createSlotFill } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { adminAppearance } from '../icons';

const { Fill, Slot } = createSlotFill( 'konturFontoMatDropdownControls' );
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
									icon={ adminAppearance }
									label={ __( 'Font', 'kontur-font-o-mat' ) }
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
