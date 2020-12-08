export default [
    {
        header: true,
        title: 'Dashboard',
        hiddenOnCollapse: true
    },
    {
        title: 'Dashboard',
        icon: 'fas fa-fire',
        child: [
            {
                href: '/',
                title: 'General Dashboard',
            },
            {
                href: '/ecommerce',
                title: 'Ecommerce Dashboard',
            }
        ]
    },
    {
        header: true,
        title: 'Starter',
        hiddenOnCollapse: true
    },
    {
        title: 'Layout',
        icon: 'fas fa-columns',
        href: '/layout'
    },
    {
        title: 'Blank Page',
        icon: 'far fa-square',
        href: '/blank'
    }
]
