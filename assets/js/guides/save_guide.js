
    ///////////////////////
    // saveGuide FUNCTION
    // called at end of previous section
    //////////////////////

    function saveGuide() {

	var lobjTabs = [];

	$('a[href^="#tab"]').each(function(){
	    var lstrName = $(this).text();
	    var lstrExternal = $(this).parent('li').attr('data-external-link');
	    var lintVisibility = parseInt($(this).parent('li').attr('data-visibility'));
	    var tab_id = $(this).attr("href").split("tabs-")[1];
            var subject_id;
            var user_name;
            var lstrTabs;
            
            
	    var lobjTab = {};
	    lobjTab.name = lstrName;
	    lobjTab.external = lstrExternal;
	    lobjTab.visibility = lintVisibility;
	    lobjTab.sections = [];

	    $('div#tabs-' + tab_id + ' div[id^="section_"]').each(function()
								  {
								      var section_id = $(this).attr("id").split("section_")[1];
								      var lobjSection = {};
                                                                      lobjSection.center_data = "";
                                                                      lobjSection.left_data = "";
                                                                      lobjSection.sidebar_data = "";

								      lobjSection.layout = $(this).attr("data-layout");

								      $('div#section_' + section_id + ' div.portal-column-0').sortable();
								      $('div#section_' + section_id + ' div.portal-column-1').sortable();
								      $('div#section_' + section_id + ' div.portal-column-2').sortable();

								      lobjSection.left_data = $('div#section_' + section_id +  ' div.portal-column-0').sortable('serialize');


								      lobjSection.center_data = $('div#section_' + section_id +  ' div.portal-column-1').sortable('serialize');
                                                                      console.log(section_id);
                                                                      console.log(lobjSection.center_data);

								      lobjSection.sidebar_data = $('div#section_' + section_id +  ' div.portal-column-2').sortable('serialize');

								      lobjTab.sections.push(lobjSection);
								  });

	    lobjTabs.push(lobjTab);
	});

	lstrTabs = JSON.stringify(lobjTabs);
        console.log(lstrTabs);
	$("#response").load("helpers/save_guide.php", {
	    this_subject_id: subject_id,
	    user_name: user_name,
	    tabs: lstrTabs
	},
			    function() {

				$("#response").fadeIn();
				refreshFeeds();

			    });

    }


    //make saveGuide global
    window.saveGuide = saveGuide; 
