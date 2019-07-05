namespace GYM
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class LoginInfos
    {
        [Key]
        [Column(Order = 0)]
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int employeeID { get; set; }

        [Key]
        [Column(Order = 1)]
        [StringLength(30)]
        public string username { get; set; }

        [Key]
        [Column(Order = 2)]
        [StringLength(30)]
        public string pass { get; set; }

        public virtual Workers Workers { get; set; }
    }
}
