-- ------------------------------- --
-- (RE)INSTALL THE ENTIRE DATABASE --
-- ------------------------------- --

-- Start of file: disable foreign keys
SET FOREIGN_KEY_CHECKS = 0;


-- Drop all tables
DROP TABLE IF EXISTS actions;


-- Sample
CREATE TABLE `actions` (
  `aid` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Primary Key: Unique actions ID.',
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT 'The object that that action acts on (node, user, comment, system or custom types.)',
  `callback` varchar(255) NOT NULL DEFAULT '' COMMENT 'The callback function that executes when the action runs.',
  `parameters` longblob NOT NULL COMMENT 'Parameters to be passed to the callback function.',
  `label` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Label of the action.',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores action information.';

INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('comment_publish_action', 'comment', 'comment_publish_action', '', 'Publish comment');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('comment_save_action', 'comment', 'comment_save_action', '', 'Save comment');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('comment_unpublish_action', 'comment', 'comment_unpublish_action', '', 'Unpublish comment');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_make_sticky_action', 'node', 'node_make_sticky_action', '', 'Make content sticky');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_make_unsticky_action', 'node', 'node_make_unsticky_action', '', 'Make content unsticky');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_promote_action', 'node', 'node_promote_action', '', 'Promote content to front page');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_publish_action', 'node', 'node_publish_action', '', 'Publish content');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_save_action', 'node', 'node_save_action', '', 'Save content');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_unpromote_action', 'node', 'node_unpromote_action', '', 'Remove content from front page');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('node_unpublish_action', 'node', 'node_unpublish_action', '', 'Unpublish content');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('system_block_ip_action', 'user', 'system_block_ip_action', '', 'Ban IP address of current user');
INSERT INTO actions (`aid`, `type`, `callback`, `parameters`, `label`) VALUES ('user_block_user_action', 'user', 'user_block_user_action', '', 'Block current user');


-- End of file: enable foreign keys
SET FOREIGN_KEY_CHECKS = 1;
