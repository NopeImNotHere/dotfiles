{"payload":{"allShortcutsEnabled":false,"fileTree":{"":{"items":[{"name":"screenshots","path":"screenshots","contentType":"directory"},{"name":"README.md","path":"README.md","contentType":"file"},{"name":"bluetooth.sh","path":"bluetooth.sh","contentType":"file"},{"name":"toggle_bluetooth.sh","path":"toggle_bluetooth.sh","contentType":"file"}],"totalCount":4}},"fileTreeProcessingTime":2.523563,"foldersToFetch":[],"reducedMotionEnabled":null,"repo":{"id":179373640,"defaultBranch":"master","name":"polybar-bluetooth","ownerLogin":"msaitz","currentUserCanPush":false,"isFork":false,"isEmpty":false,"createdAt":"2019-04-03T21:33:31.000Z","ownerAvatar":"https://avatars.githubusercontent.com/u/7726691?v=4","public":true,"private":false,"isOrgOwned":false},"symbolsExpanded":false,"treeExpanded":true,"refInfo":{"name":"master","listCacheKey":"v0:1554327213.0","canEdit":false,"refType":"branch","currentOid":"44ae51f5d78e7e26810a59eaaf381f7bee887585"},"path":"bluetooth.sh","currentUser":null,"blob":{"rawLines":["#!/bin/sh","if [ $(bluetoothctl show | grep \"Powered: yes\" | wc -c) -eq 0 ]","then","  echo \"%{F#66ffffff}\"","else","  if [ $(echo info | bluetoothctl | grep 'Device' | wc -c) -eq 0 ]","  then ","    echo \"\"","  fi","  echo \"%{F#2193ff}\"","fi"],"stylingDirectives":[[{"start":0,"end":9,"cssClass":"pl-c"},{"start":0,"end":2,"cssClass":"pl-c"}],[{"start":0,"end":2,"cssClass":"pl-k"},{"start":5,"end":55,"cssClass":"pl-s"},{"start":5,"end":7,"cssClass":"pl-pds"},{"start":25,"end":26,"cssClass":"pl-k"},{"start":32,"end":46,"cssClass":"pl-s"},{"start":32,"end":33,"cssClass":"pl-pds"},{"start":45,"end":46,"cssClass":"pl-pds"},{"start":47,"end":48,"cssClass":"pl-k"},{"start":54,"end":55,"cssClass":"pl-pds"},{"start":56,"end":59,"cssClass":"pl-k"}],[{"start":0,"end":4,"cssClass":"pl-k"}],[{"start":2,"end":6,"cssClass":"pl-c1"},{"start":7,"end":23,"cssClass":"pl-s"},{"start":7,"end":8,"cssClass":"pl-pds"},{"start":22,"end":23,"cssClass":"pl-pds"}],[{"start":0,"end":4,"cssClass":"pl-k"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":7,"end":58,"cssClass":"pl-s"},{"start":7,"end":9,"cssClass":"pl-pds"},{"start":19,"end":20,"cssClass":"pl-k"},{"start":34,"end":35,"cssClass":"pl-k"},{"start":41,"end":49,"cssClass":"pl-s"},{"start":41,"end":42,"cssClass":"pl-pds"},{"start":48,"end":49,"cssClass":"pl-pds"},{"start":50,"end":51,"cssClass":"pl-k"},{"start":57,"end":58,"cssClass":"pl-pds"},{"start":59,"end":62,"cssClass":"pl-k"}],[{"start":2,"end":6,"cssClass":"pl-k"}],[{"start":4,"end":8,"cssClass":"pl-c1"},{"start":9,"end":12,"cssClass":"pl-s"},{"start":9,"end":10,"cssClass":"pl-pds"},{"start":11,"end":12,"cssClass":"pl-pds"}],[{"start":2,"end":4,"cssClass":"pl-k"}],[{"start":2,"end":6,"cssClass":"pl-c1"},{"start":7,"end":21,"cssClass":"pl-s"},{"start":7,"end":8,"cssClass":"pl-pds"},{"start":20,"end":21,"cssClass":"pl-pds"}],[{"start":0,"end":2,"cssClass":"pl-k"}],[]],"csv":null,"csvError":null,"dependabotInfo":{"showConfigurationBanner":false,"configFilePath":null,"networkDependabotPath":"/msaitz/polybar-bluetooth/network/updates","dismissConfigurationNoticePath":"/settings/dismiss-notice/dependabot_configuration_notice","configurationNoticeDismissed":null,"repoAlertsPath":"/msaitz/polybar-bluetooth/security/dependabot","repoSecurityAndAnalysisPath":"/msaitz/polybar-bluetooth/settings/security_analysis","repoOwnerIsOrg":false,"currentUserCanAdminRepo":false},"displayName":"bluetooth.sh","displayUrl":"https://github.com/msaitz/polybar-bluetooth/blob/master/bluetooth.sh?raw=true","headerInfo":{"blobSize":"233 Bytes","deleteInfo":{"deleteTooltip":"You must be signed in to make or propose changes"},"editInfo":{"editTooltip":"You must be signed in to make or propose changes"},"ghDesktopPath":"https://desktop.github.com","gitLfsPath":null,"onBranch":true,"shortPath":"fea6d95","siteNavLoginPath":"/login?return_to=https%3A%2F%2Fgithub.com%2Fmsaitz%2Fpolybar-bluetooth%2Fblob%2Fmaster%2Fbluetooth.sh","isCSV":false,"isRichtext":false,"toc":null,"lineInfo":{"truncatedLoc":"12","truncatedSloc":"11"},"mode":"executable file"},"image":false,"isCodeownersFile":null,"isPlain":false,"isValidLegacyIssueTemplate":false,"issueTemplateHelpUrl":"https://docs.github.com/articles/about-issue-and-pull-request-templates","issueTemplate":null,"discussionTemplate":null,"language":"Shell","languageID":346,"large":false,"loggedIn":false,"newDiscussionPath":"/msaitz/polybar-bluetooth/discussions/new","newIssuePath":"/msaitz/polybar-bluetooth/issues/new","planSupportInfo":{"repoIsFork":null,"repoOwnedByCurrentUser":null,"requestFullPath":"/msaitz/polybar-bluetooth/blob/master/bluetooth.sh","showFreeOrgGatedFeatureMessage":null,"showPlanSupportBanner":null,"upgradeDataAttributes":null,"upgradePath":null},"publishBannersInfo":{"dismissActionNoticePath":"/settings/dismiss-notice/publish_action_from_dockerfile","dismissStackNoticePath":"/settings/dismiss-notice/publish_stack_from_file","releasePath":"/msaitz/polybar-bluetooth/releases/new?marketplace=true","showPublishActionBanner":false,"showPublishStackBanner":false},"rawBlobUrl":"https://github.com/msaitz/polybar-bluetooth/raw/master/bluetooth.sh","renderImageOrRaw":false,"richText":null,"renderedFileInfo":null,"shortPath":null,"tabSize":8,"topBannersInfo":{"overridingGlobalFundingFile":false,"globalPreferredFundingPath":null,"repoOwner":"msaitz","repoName":"polybar-bluetooth","showInvalidCitationWarning":false,"citationHelpUrl":"https://docs.github.com/en/github/creating-cloning-and-archiving-repositories/creating-a-repository-on-github/about-citation-files","showDependabotConfigurationBanner":false,"actionsOnboardingTip":null},"truncated":false,"viewable":true,"workflowRedirectUrl":null,"symbols":{"timed_out":false,"not_analyzed":false,"symbols":[]}},"copilotInfo":null,"copilotAccessAllowed":false,"csrf_tokens":{"/msaitz/polybar-bluetooth/branches":{"post":"Ym1O7BkdR2QM3b53mjIVQ9X0JLq-dVnEoKoWdvBgg5q9COJe2gTR2EllmPmk9bAIxBSaAV30D9SiDOESbQHkEg"},"/repos/preferences":{"post":"NpyKoYMGbPGjnPg1-b4Jc_Rc4EPYC61njsTIPWl2mXUoDoXxBwH7u40s5juqOFoEUPkPcMX6P6Y2Ge-t3qSg2w"}}},"title":"polybar-bluetooth/bluetooth.sh at master · msaitz/polybar-bluetooth"}