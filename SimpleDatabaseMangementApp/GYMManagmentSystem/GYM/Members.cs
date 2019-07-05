namespace GYM
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Members
    {
        [Key]
        public int memberId { get; set; }

        [Required]
        [StringLength(30)]
        public string memberName { get; set; }

        [Required]
        [StringLength(30)]
        public string memberLastName { get; set; }

        public int memberAge { get; set; }

        [Required]
        [StringLength(15)]
        public string memberGender { get; set; }

        public double memberHeight { get; set; }

        public double memberWeight { get; set; }

        public int subId { get; set; }

        public virtual Subscriptions Subscriptions { get; set; }
    }
}
