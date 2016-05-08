
function drawGraphics() {
    var winrates = new google.visualization.DataTable();
    winrates.addColumn('number', 'X');
    winrates.addColumn('number', 'Win rate:');
    winrates.addRows(winratiopoints);
    var optionswinrates = {
        hAxis: {
            title: 'Mastery points'
        },
        curveType: 'function',
        vAxis: {
            title: 'Win Rate'
        },
        trendlines: {
            0: {type: 'exponential', color: '#333', opacity: 0.5}
        }
    };
    var gold = new google.visualization.DataTable();
    gold.addColumn('number', 'X');
    gold.addColumn('number', 'Gold per Match:');
    gold.addRows(goldpoints);

    var optionsgold = {
        hAxis: {
            title: 'Mastery points'
        },
        curveType: 'function',
        vAxis: {
            title: 'Gold'
        },
        trendlines: {
            0: {type: 'exponential', color: '#333', opacity: 0.50}
        }
    };

    ////////////////////////////////

    var kda = new google.visualization.DataTable();
    kda.addColumn('number', 'X');
    kda.addColumn('number', 'Total KDA');
    kda.addRows(kdapoints);

    var optionskda = {
        hAxis: {
            title: 'Mastery points'
        },
        curveType: 'function',
        vAxis: {
            title: 'Kda'
        },
        trendlines: {
            0: {type: 'exponential', color: '#333', opacity: 0.50}
        }
    };
    ///////////////////////////////

    ////////////////////////////////

    var totalMatches = new google.visualization.DataTable();
    totalMatches.addColumn('number', 'X');
    totalMatches.addColumn('number', 'Total Games Played');

    totalMatches.addRows(matchespoints);
    var optionsMatches = {
        hAxis: {
            title: 'Mastery points'
        },
        curveType: 'function',
        vAxis: {
            title: 'Total Games Played'
        },
        trendlines: {
            0: {type: 'exponential', color: '#333', opacity: 0.50}
        }
    };
    ///////////////////////////////

    var goldchart = new google.visualization.LineChart(document.getElementById('gold_chart'));
    goldchart.draw(gold, optionsgold);

    var winratechart = new google.visualization.LineChart(document.getElementById('winratio_chart'));
    winratechart.draw(winrates, optionswinrates);
    var kdachart = new google.visualization.LineChart(document.getElementById('kda_chart'));
    kdachart.draw(kda, optionskda);
    var matcheschart = new google.visualization.LineChart(document.getElementById('played_chart'));
    matcheschart.draw(totalMatches, optionsMatches);
}