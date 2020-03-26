$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: 'Jan',
            iphone: 2666,
            ipad: null,
            itouch: 2647
        }, {
            period: 'Fev',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
        }, {
            period: 'Mar',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Abr',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Mai',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Jun',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Jul',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Ago',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Set',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Out',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Nov',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
            }, {
            period: 'Dez',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441

        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['Produtos em Estoque', 'Produtos Vendidos', 'Produtos Devolver'],
        pointSize: 2,
        parseTime: false,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
